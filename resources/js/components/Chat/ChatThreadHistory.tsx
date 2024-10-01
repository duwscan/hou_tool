import React, { useState, useEffect } from 'react'
import { ScrollArea } from "@/components/ui/scroll-area"
import { Button } from "@/components/ui/button"
import { Sheet, SheetContent, SheetHeader, SheetTitle, SheetDescription, SheetFooter, SheetClose } from "@/components/ui/sheet"
import { Menu, X } from "lucide-react"

interface ChatThread {
    id: string
    title: string
    lastMessage: string
    timestamp: string
    fullContent: string
}

export default function ChatThreadHistory() {
    const [isMobile, setIsMobile] = useState(false)
    const [isListOpen, setIsListOpen] = useState(false)
    const [selectedThread, setSelectedThread] = useState<ChatThread | null>(null)

    useEffect(() => {
        const checkIsMobile = () => setIsMobile(window.innerWidth < 768)
        checkIsMobile()
        window.addEventListener('resize', checkIsMobile)
        return () => window.removeEventListener('resize', checkIsMobile)
    }, [])

    const chatThreads: ChatThread[] = [
        {
            id: '1',
            title: 'Account Issues and General Inquiries',
            lastMessage: 'Thank you for your help! I really appreciate your assistance with this matter.',
            timestamp: '2 mins ago',
            fullContent: 'User: I\'m having trouble accessing my account.\nAgent: I\'m sorry to hear that. Can you please provide me with your account email?\nUser: Sure, it\'s user@example.com\nAgent: Thank you. I\'ve reset your account. Please check your email for further instructions.\nUser: I\'ve received the email and followed the steps. It works now!\nAgent: I\'m glad to hear that. Is there anything else I can help you with?\nUser: No, that\'s all. Thank you for your help! I really appreciate your assistance with this matter.'
        },
        {
            id: '2',
            title: 'Product Inquiry',
            lastMessage: 'What are the shipping options?',
            timestamp: '1 hour ago',
            fullContent: 'User: Hello, I\'m interested in purchasing your product.\nAgent: That\'s great! What would you like to know?\nUser: What are the shipping options?\nAgent: We offer standard shipping (3-5 business days) and express shipping (1-2 business days). The cost depends on your location.'
        },
        {
            id: '3',
            title: 'Technical Support for Multiple Devices',
            lastMessage: 'The issue has been resolved. Thank you for your patience throughout this process.',
            timestamp: '3 hours ago',
            fullContent: 'User: I\'m experiencing issues with your app on multiple devices.\nAgent: I\'m sorry to hear that. Can you please specify which devices and the nature of the issues?\nUser: It\'s not working on my iPhone and iPad. The app keeps crashing.\nAgent: Thank you for the information. Let\'s troubleshoot this step by step. First, can you try...\n[Several troubleshooting steps later]\nUser: Great! It\'s working now on both devices.\nAgent: I\'m glad to hear that. The issue has been resolved. Thank you for your patience throughout this process.'
        },
        // Add more threads as needed
    ]

    const ThreadList = () => (
        <ScrollArea className="h-full">
            {chatThreads.map((thread) => (
                <div
                    key={thread.id}
                    className="p-4 border-b border-gray-200 hover:bg-gray-50 cursor-pointer"
                    onClick={() => setSelectedThread(thread)}
                >
                    <h3 className="font-semibold text-sm truncate" title={thread.title}>
                        {thread.title}
                    </h3>
                    <p className="text-sm text-gray-500 truncate" title={thread.lastMessage}>
                        {thread.lastMessage}
                    </p>
                    <p className="text-xs text-gray-400 mt-1">{thread.timestamp}</p>
                </div>
            ))}
        </ScrollArea>
    )

    const ThreadDrawer = () => (
        <Sheet open={!!selectedThread} onOpenChange={() => setSelectedThread(null)}>
            <SheetContent side="right">
                <SheetHeader>
                    <SheetTitle>{selectedThread?.title}</SheetTitle>
                    <SheetDescription>{selectedThread?.timestamp}</SheetDescription>
                </SheetHeader>
                <ScrollArea className="h-[calc(100vh-200px)] mt-4">
                    <p className="whitespace-pre-wrap">{selectedThread?.fullContent}</p>
                </ScrollArea>
                <SheetFooter>
                    <SheetClose asChild>
                        <Button variant="outline">Close</Button>
                    </SheetClose>
                </SheetFooter>
            </SheetContent>
        </Sheet>
    )

    if (isMobile) {
        return (
            <>
                <Button
                    variant="outline"
                    size="icon"
                    className="fixed top-4 left-4 z-50"
                    onClick={() => setIsListOpen(true)}
                >
                    <Menu className="h-4 w-4" />
                    <span className="sr-only">Open chat history</span>
                </Button>
                <Sheet open={isListOpen} onOpenChange={setIsListOpen}>
                    <SheetContent side="right" className="w-[300px] sm:w-[400px]">
                        <SheetHeader>
                            <SheetTitle>Chat History</SheetTitle>
                        </SheetHeader>
                        <div className="h-[calc(100vh-100px)] mt-4">
                            <ThreadList />
                        </div>
                    </SheetContent>
                </Sheet>
                <ThreadDrawer />
            </>
        )
    }

    return (
        <>
            <div className="w-80 h-[80vh] sm:h-[75vh] border-r border-gray-200 bg-white flex flex-col">
                <div className="p-4 border-b border-gray-200">
                    <h2 className="text-lg font-semibold">Chat History</h2>
                </div>
                <div className="flex-grow overflow-hidden">
                    <ThreadList />
                </div>
            </div>
            <ThreadDrawer />
        </>
    )
}
