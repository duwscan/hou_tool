import React, {useState} from 'react'
import {Button} from "@/components/ui/button"
import {ScrollArea} from "@/components/ui/scroll-area"
import {MessageSquare, Compass, LayoutGrid, Edit2, Star, MoreHorizontal, Pencil, Trash2, Share} from 'lucide-react'
import {DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger} from "@/components/ui/dropdown-menu";
import {Input} from "@/components/ui/input";
import {groupThreads, selectedThread, ThreadGroup} from "@/stores/ThreadStore";
import {useRecoilState, useRecoilValue} from "recoil";
import {useThread} from "@/hooks/useThread";
import {cn} from "@/lib/utils";
import {Link} from "@inertiajs/react";

export default function Sidebar() {
    const threadGroups: ThreadGroup[] = useRecoilValue(groupThreads)
    return (
        <div className="w-70 max-w-70 h-screen bg-white text-gray-800 flex flex-col border-r border-gray-200">
            <div className="px-4 py-2 space-y-4">
                <Button variant="ghost" className="w-full justify-start text-gray-800 hover:bg-gray-100">
                    <a href="/" className="flex items-center">
                        <MessageSquare className="mr-2 h-4 w-4"/>
                        HOU BOT
                    </a>
                </Button>
                <Button variant="ghost" className="w-full justify-start text-gray-800 hover:bg-gray-100">
                    <Compass className="mr-2 h-4 w-4"/>
                    Trang chủ HOU
                </Button>
            </div>
            <ScrollArea className="flex-grow px-4 py-2 w-full">
                {threadGroups.map((group, index) => (
                    <div key={index} className="mb-4 w-full">
                        <h3 className="text-xs font-semibold mb-2 text-gray-500">{group.title}</h3>
                        {group.items.map((item, itemIndex) => (
                            <ThreadItem {...item} key={item.id}/>
                        ))}
                    </div>
                ))}
            </ScrollArea>
            <div className="p-4 border-t border-gray-200">
                <Button variant="ghost" className="w-full justify-start text-blue-600 hover:bg-blue-50">
                    <Star className="mr-2 h-4 w-4"/>
                    Tiện ích
                </Button>
            </div>
        </div>
    )
}

const ThreadItem: React.FC<{
    thread_name: string
    id: number
}> = ({thread_name, id}) => {
    const [isRenaming, setIsRenaming] = useState(false)
    const [selectedThreadId, _] = useRecoilState(selectedThread);
    const [newTitle, setNewTitle] = useState(thread_name)
    const {renameThread, deleteThread} = useThread()
    const handleRename = () => {
        renameThread(id, newTitle);
        setIsRenaming(false);
    }
    return (
        <div
            className={cn("flex w-full flex-row items-center justify-between space-y-0 p-1 rounded-xl hover:bg-accent hover:text-accent-foreground",
                selectedThreadId === id ? "bg-accent text-accent-foreground text-white-700 " : ''
            )}>
            {isRenaming ? (
                <Input
                    value={newTitle}
                    onChange={(e) => setNewTitle(e.target.value)}
                    onKeyPress={(e) => e.key === 'Enter' && handleRename()}
                    className="w-full mr-2 bg-white"
                />
            ) : (
                <Button
                    key={Math.random()}
                    variant="unstyled"
                    className={"w-64 overflow-hidden justify-start py-1 px-2 h-auto text-sm font-normal truncate"}>
                    <Link href={route('threads.chats.index', id)} className={"w-70 truncate"}>
                        {thread_name}
                    </Link>

                </Button>
            )}
            <DropdownMenu>
                <DropdownMenuTrigger asChild>
                    <Button variant="ghost" className="h-8 w-8 p-0 flex-shrink-0">
                        <span className="sr-only">Open menu</span>
                        <MoreHorizontal className="h-4 w-4"/>
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent align="end">
                    <DropdownMenuItem onClick={() => setIsRenaming(true)}>
                        <Pencil className="mr-2 h-4 w-4"/>
                        <span>Đổi tên</span>
                    </DropdownMenuItem>
                    <DropdownMenuItem onClick={() => deleteThread(id)}>
                        <Trash2 className="mr-2 h-4 w-4"/>
                        <span>Xóa</span>
                    </DropdownMenuItem>
                    <DropdownMenuItem>
                        <Share className="mr-2 h-4 w-4"/>
                        <span>Chia sẻ</span>
                    </DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
    )
}
