import PanelLayout from "@/components/Layout/Layout";
import Composer from "@/components/Composer";
import {ChatMessage as ChatMessageType} from "@/types";
import {ScrollArea} from "@/components/ui/scroll-area";
import {useEffect, useRef, useState} from "react";
import ChatMessage from "@/components/Chat/ChatMessage";
import ChatThreadHistory from "@/components/Chat/ChatThreadHistory";

const Chat = () => {
    const [messages, setMessages] = useState<ChatMessageType[]>([
        {id: '1', content: "Hello! I'm BookBot. How can I assist you with book recommendations today?", sender: 'bot'},
        {id: '2', content: "Hi BookBot! I'm looking for some science fiction recommendations.", sender: 'user'},
        {
            id: '3',
            content: "Great choice! Science fiction offers a wide range of fascinating stories. Here are a few popular recommendations:\n\n1. 'Dune' by Frank Herbert\n2. 'The Hitchhiker's Guide to the Galaxy' by Douglas Adams\n3. 'Neuromancer' by William Gibson\n4. '1984' by George Orwell\n5. 'The Martian' by Andy Weir\n\nDo any of these interest you, or would you like more suggestions?",
            sender: 'bot'
        },
        {id: '4', content: "Dune sounds interesting. Can you tell me more about it?", sender: 'user'},
        {
            id: '5',
            content: "Excellent choice! 'Dune' by Frank Herbert is a classic science fiction novel first published in 1965. Here's a brief overview:\n\n- Set in a distant future, it explores themes of politics, religion, and ecology.\n- The story follows Paul Atreides, whose family accepts control of the desert planet Arrakis.\n- Arrakis is the only source of the 'spice' melange, the most important and valuable substance in the universe.\n- The novel combines adventure, mysticism, and complex world-building.\n- It's known for its intricate plot, memorable characters, and exploration of human potential.\n\nWould you like to know more about 'Dune' or explore other sci-fi options?",
            sender: 'bot'
        },
        {id: '6', content: "Hello! I'm BookBot. How can I assist you with book recommendations today?", sender: 'bot'},
        {id: '7', content: "Hi BookBot! I'm looking for some science fiction recommendations.", sender: 'user'},
        {
            id: '8',
            content: "Great choice! Science fiction offers a wide range of fascinating stories. Here are a few popular recommendations:\n\n1. 'Dune' by Frank Herbert\n2. 'The Hitchhiker's Guide to the Galaxy' by Douglas Adams\n3. 'Neuromancer' by William Gibson\n4. '1984' by George Orwell\n5. 'The Martian' by Andy Weir\n\nDo any of these interest you, or would you like more suggestions?",
            sender: 'bot'
        },
        {id: '9', content: "Dune sounds interesting. Can you tell me more about it?", sender: 'user'},
        {
            id: '10',
            content: "Excellent choice! 'Dune' by Frank Herbert is a classic science fiction novel first published in 1965. Here's a brief overview:\n\n- Set in a distant future, it explores themes of politics, religion, and ecology.\n- The story follows Paul Atreides, whose family accepts control of the desert planet Arrakis.\n- Arrakis is the only source of the 'spice' melange, the most important and valuable substance in the universe.\n- The novel combines adventure, mysticism, and complex world-building.\n- It's known for its intricate plot, memorable characters, and exploration of human potential.\n\nWould you like to know more about 'Dune' or explore other sci-fi options?",
            sender: 'bot'
        },
    ])
    const scrollAreaRef = useRef<HTMLDivElement>(null)
    useEffect(() => {
        if (scrollAreaRef.current) {
            scrollAreaRef.current.scrollTop = scrollAreaRef.current.scrollHeight
        }
    }, [messages])
    return (
        <>
            <PanelLayout>
                <div
                    className={'w-full md:max-w-3xl lg:max-w-[40rem] xl:max-w-[48rem] mx-auto px-1 sm:px-4 pt-4 sm:pt-8 flex flex-col h-full justify-between'}>
                    <div className={'flex col'}>
                        <ScrollArea className="h-[80vh] sm:h-[75vh] px-4s pb-4 mb-4" ref={scrollAreaRef}>
                            {messages.map((message) => (
                                <ChatMessage key={message.id} message={message}/>
                            ))}
                        </ScrollArea>
                    </div>
                    <div className={''}>
                        <Composer/>
                    </div>
                </div>
            </PanelLayout>
        </>
    )
}

export default Chat;
