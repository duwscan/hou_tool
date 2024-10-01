"use client"

import { useState, useEffect, useRef } from 'react'
import { Button } from "@/components/ui/button"
import { Textarea } from "@/components/ui/textarea"
import { ArrowUp } from "lucide-react"
import {useChat} from "@/hooks/useChat";

export default function Composer() {
    const [isExpanded, setIsExpanded] = useState(false)
    const [inputValue, setInputValue] = useState('')
    const textareaRef = useRef<HTMLTextAreaElement>(null)
    const {addMessage} = useChat()
    useEffect(() => {
        const handleKeyDown = (event: KeyboardEvent) => {
            if (event.ctrlKey && event.key === 'Enter') {
                setIsExpanded(true)
                if (textareaRef.current) {
                    textareaRef.current.style.height = 'auto'
                    textareaRef.current.style.height = `${textareaRef.current.scrollHeight}px`
                }
            }
        }

        window.addEventListener('keydown', handleKeyDown)
        return () => window.removeEventListener('keydown', handleKeyDown)
    }, [])

    const handleInputChange = (event: React.ChangeEvent<HTMLTextAreaElement>) => {
        setInputValue(event.target.value)
        if (textareaRef.current) {
            textareaRef.current.style.height = 'auto'
            textareaRef.current.style.height = `${textareaRef.current.scrollHeight}px`
        }
    }
    const handleSendMessage = () => {
        if(!inputValue.trim()) return
        addMessage(inputValue)
        setInputValue('')
        setIsExpanded(false)
    }
    return (
        <div className="relative mb-4">
            <Textarea
                ref={textareaRef}
                className="w-full pl-4 pr-10 py-2 border rounded-md resize-none overflow-hidden"
                placeholder="Bạn muốn hỏi gì?..."
                value={inputValue}
                onChange={handleInputChange}
                rows={isExpanded ? 4 : 1}
            />
            <Button
                onClick={handleSendMessage}
                className="absolute right-2 bottom-2"
                size="sm"
                variant="ghost"
            >
                <ArrowUp className="h-4 w-4"/>
            </Button>
        </div>
    )
}
