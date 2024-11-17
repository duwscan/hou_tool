"use client"

import { Button } from "@/components/ui/button"
import { badgeVariants } from "@/components/ui/badge"
import {ArrowUpCircle } from "lucide-react"
import Composer from "@/components/Composer";
import {Link} from "@inertiajs/react";
import {MdArrowOutward} from "react-icons/md";
import {useChat} from "@/hooks/useChat";
const Suggestions = [
    {
        id : 1,
        text : "Trường đại học Mở có các cơ sở nào"
    },
    {
        id : 2,
        text: "Trường đại học Mở có ngành nào"
    },
    {
        id: 3,
        text: "Trường đại học Mở có chương trình nào"
    }
]
export default function ChatHero() {
    const {addMessage, isSending} = useChat()
    const handleNewThreadWithSuggestion = (suggestion: string) => {
        addMessage(suggestion, 'empty_thread')
    }
    return (
        <div className="w-full max-w-3xl mx-auto px-4 py-8 flex flex-col h-full">
            <div className={`flex-grow flex flex-col justify-center`}>
                <div className="pt-6">
                    <h1 className="text-4xl font-bold text-center mb-2">Tôi có thể giúp bạn với điều gì?</h1>
                    <p className="text-center text-muted-foreground mb-8">
                       Hỏi đáp về học phần, chương trình học, cơ sở vật chất, văn hóa sinh viên, ...
                    </p>
                    <Composer />
                    <div className="flex flex-wrap justify-center gap-2">
                        {Suggestions.map((suggestion) => (
                            <button className={badgeVariants({variant: "outline"})}
                                  onClick={() => handleNewThreadWithSuggestion(suggestion.text)}>
                                {suggestion.text}
                                <MdArrowOutward />
                            </button>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    )
}
