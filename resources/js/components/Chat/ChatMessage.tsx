import React from "react";
import {Avatar, AvatarFallback, AvatarImage} from "@/components/ui/avatar";
import {Chat} from "@/stores/ChatStore";
import {Loader2} from "lucide-react";
import BotThinking from "@/components/Chat/BotThinking";
import ReactMarkdown from 'react-markdown';

const ChatMessage: React.FC<{ message: Chat }> = ({message}) => {
    const isUser = message.sender === 'user'
    return (
        <>
            <div className={`flex ${isUser ? 'justify-end' : 'justify-start'} mb-5 px-2 sm:px-0`}>
                {!isUser && (
                    <Avatar className="w-8 h-8 mr-2 flex-shrink-0">
                        <AvatarImage src="/placeholder.svg?height=32&width=32" alt="Bot Avatar"/>
                        <AvatarFallback>BOT</AvatarFallback>
                    </Avatar>
                )}
                <div>
                    <div
                        className={`px-4 py-2 rounded-lg ${
                            isUser
                                ? 'bg-primary text-primary-foreground ml-12 sm:ml-24'
                                : 'bg-secondary text-secondary-foreground mr-12 sm:mr-24'
                        } ${isUser ? 'rounded-br-none' : 'rounded-bl-none'} break-words prose prose-sm max-w-none dark:prose-invert`}
                    >
                        <ReactMarkdown>{message.message}</ReactMarkdown>
                    </div>
                </div>
            </div>
            <div className={`flex justify-start mb-5 px-2 sm:px-0`}>
                {message.status === 'sending' && (<BotThinking/>)}
            </div>
        </>
    )
}

export default ChatMessage;
