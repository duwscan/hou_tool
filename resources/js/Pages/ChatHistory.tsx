import React, { useState } from 'react'
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from "@/components/ui/card"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu"
import {MoreHorizontal, Pencil, Share, Trash2} from "lucide-react"
import PanelLayout from "@/components/Layout/Layout";

interface Chat {
    id: string
    title: string
    description: string
    updatedAt: string
}

const ChatCard: React.FC<{
    chat: Chat
    onDelete: (id: string) => void
    onRename: (id: string, newTitle: string) => void
}> = ({ chat, onDelete, onRename }) => {
    const [isRenaming, setIsRenaming] = useState(false)
    const [newTitle, setNewTitle] = useState(chat.title)

    const handleRename = () => {
        onRename(chat.id, newTitle)
        setIsRenaming(false)
    }

    return (
        <Card className="w-full ">
            <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                {isRenaming ? (
                    <Input
                        value={newTitle}
                        onChange={(e) => setNewTitle(e.target.value)}
                        onKeyPress={(e) => e.key === 'Enter' && handleRename()}
                        className="w-full mr-2"
                    />
                ) : (
                    <CardTitle className="text-sm font-bold truncate flex-grow mr-2">{chat.title}</CardTitle>
                )}
                <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        <Button variant="ghost" className="h-8 w-8 p-0 flex-shrink-0">
                            <span className="sr-only">Open menu</span>
                            <MoreHorizontal className="h-4 w-4" />
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end">
                        <DropdownMenuItem onClick={() => setIsRenaming(true)}>
                            <Pencil className="mr-2 h-4 w-4" />
                            <span>Đổi tên</span>
                        </DropdownMenuItem>
                        <DropdownMenuItem onClick={() => onDelete(chat.id)}>
                            <Trash2 className="mr-2 h-4 w-4" />
                            <span>Xóa</span>
                        </DropdownMenuItem>
                        <DropdownMenuItem>
                            <Share className="mr-2 h-4 w-4" />
                            <span>Chia sẻ</span>
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            </CardHeader>
            <CardContent>
                <p className="text-xs text-muted-foreground line-clamp-2">{chat.description}</p>
            </CardContent>
            <CardFooter>
                <p className="text-xs text-muted-foreground">{chat.updatedAt}</p>
            </CardFooter>
        </Card>
    )
}

export default function ResponsiveChatList() {
    const [chats, setChats] = useState<Chat[]>([
        {
            id: '1',
            title: 'Dashboard ádasdasdasdasdasdadasdsad',
            description: "I've started a new thread with the following code from [shadcn/ui] (https://ui.shadcn.com/blocks)[*1]: ```tsx project=\"Dashboard\"...",
            updatedAt: 'Updated 1 day ago'
        },
        {
            id: '2',
            title: 'Admin Panel Layout',
            description: "I'll create a large, multi-step form for creating a website and integrate it into your admin panel layout. This will ensure the form is...",
            updatedAt: 'Updated 15 hours ago'
        },
        {
            id: '3',
            title: 'User Authentication Flow',
            description: "Let's implement a secure user authentication flow using Next.js, including sign up, login, and password reset functionalities...",
            updatedAt: 'Updated 2 days ago'
        },
        {
            id: '4',
            title: 'API Integration',
            description: "We'll create a robust API integration layer to connect our frontend with various backend services, ensuring efficient data flow...",
            updatedAt: 'Updated 3 days ago'
        }
    ])

    const handleDelete = (id: string) => {
        setChats(chats.filter(chat => chat.id !== id))
    }

    const handleRename = (id: string, newTitle: string) => {
        setChats(chats.map(chat =>
            chat.id === id ? { ...chat, title: newTitle } : chat
        ))
    }

    return (
        <PanelLayout>
            <div className="container mx-auto p-4 w-6xl">
                <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    {chats.map(chat => (
                        <ChatCard
                            key={chat.id}
                            chat={chat}
                            onDelete={handleDelete}
                            onRename={handleRename}
                        />
                    ))}
                </div>
            </div>
        </PanelLayout>

    )
}
