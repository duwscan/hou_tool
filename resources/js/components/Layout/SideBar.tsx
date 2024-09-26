import React, {useState} from 'react'
import { Button } from "@/components/ui/button"
import { ScrollArea } from "@/components/ui/scroll-area"
import {MessageSquare, Compass, LayoutGrid, Edit2, Star, MoreHorizontal, Pencil, Trash2, Share} from 'lucide-react'
import {DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger} from "@/components/ui/dropdown-menu";
import {Input} from "@/components/ui/input";

interface ConversationGroup {
    title: string
    items: string[]
}

export default function Sidebar() {
    const conversationGroups: ConversationGroup[] = [
        {
            title: "Today",
            items: ["Inertiajs Flash Session Handling"]
        },
        {
            title: "Previous 30 Days",
            items: [
                "Route Binding Comparison",
                "JSON Field Update Issue",
                "Thêm prefix vào key",
                "Dispatch Job on Queue",
                "Type vs Interface TS",
                "Prefix and Suffix Explained",
                "User ID Implementation Inquiry",
                "Laravel Value Validation",
                "Sync Communication Between M"
            ]
        },
        {
            title: "August",
            items: [
                "Function Bug Analysis",
                "Recoil Authentication Setup",
                "Laravel Models and Migrations",
                "Tóm tắt học PHP",
                "HTML Localization Guide",
                "Directory Creation Issue",
                "Get Model Fillable Fields",
                "Controlling Next Button PHP"
            ]
        },
        {
            title: "August",
            items: [
                "Function Bug Analysis",
                "Recoil Authentication Setup",
                "Laravel Models and Migrations",
                "Tóm tắt học PHP",
                "HTML Localization Guide",
                "Directory Creation Issue",
                "Get Model Fillable Fields",
                "Controlling Next Button PHP"
            ]
        },
        {
            title: "August",
            items: [
                "Function Bug Analysis",
                "Recoil Authentication Setup",
                "Laravel Models and Migrations",
                "Tóm tắt học PHP",
                "HTML Localization Guide",
                "Directory Creation Issue",
                "Get Model Fillable Fields",
                "Controlling Next Button PHP"
            ]
        },
    ]
    return (
        <div className="w-70 h-screen bg-white text-gray-800 flex flex-col border-r border-gray-200">
            <div className="px-4 py-2 space-y-4">
                <Button variant="ghost" className="w-full justify-start text-gray-800 hover:bg-gray-100">
                    <a href="/" className="flex items-center">
                        <MessageSquare className="mr-2 h-4 w-4" />
                        HOU BOT
                    </a>
                </Button>
                <Button variant="ghost" className="w-full justify-start text-gray-800 hover:bg-gray-100">
                    <Compass className="mr-2 h-4 w-4" />
                    Trang chủ HOU
                </Button>
            </div>
            <ScrollArea className="flex-grow px-4 py-2">
                {conversationGroups.map((group, index) => (
                    <div key={index} className="mb-4">
                        <h3 className="text-xs font-semibold mb-2 text-gray-500">{group.title}</h3>
                        {group.items.map((item, itemIndex) => (
                            <ThreadItem chat={item}/>
                        ))}
                    </div>
                ))}
            </ScrollArea>
            <div className="p-4 border-t border-gray-200">
                <Button variant="ghost" className="w-full justify-start text-blue-600 hover:bg-blue-50">
                    <Star className="mr-2 h-4 w-4" />
                   Tiện ích
                </Button>
                <p className="text-xs text-gray-500 mt-1">More access to the best models</p>
            </div>
        </div>
    )
}

const ThreadItem: React.FC<{
    chat: string
}> = ({ chat }) =>{
    const [isRenaming, setIsRenaming] = useState(false)
    const [newTitle, setNewTitle] = useState(chat)
    const handleRename = () => {
        setIsRenaming(false)
    }

    return (
        <div className="flex flex-row items-center justify-between space-y-0 pb-2">
            {isRenaming ? (
                <Input
                    value={newTitle}
                    onChange={(e) => setNewTitle(e.target.value)}
                    onKeyPress={(e) => e.key === 'Enter' && handleRename()}
                    className="w-full mr-2"
                />
            ) : (
                <Button
                    key={Math.random()}
                    variant="ghost"
                    className="w-full justify-start py-1 px-2 h-auto text-sm font-normal text-gray-700 hover:bg-gray-100"
                >
                    {chat}
                </Button>
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
                    <DropdownMenuItem>
                        <Trash2 className="mr-2 h-4 w-4" />
                        <span>Xóa</span>
                    </DropdownMenuItem>
                    <DropdownMenuItem>
                        <Share className="mr-2 h-4 w-4" />
                        <span>Chia sẻ</span>
                    </DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
    )
}
