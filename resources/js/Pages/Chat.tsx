import PanelLayout from "@/components/Layout/Layout";
import Composer from "@/components/Composer";
import {ScrollArea} from "@/components/ui/scroll-area";
import {useEffect, useRef, useState} from "react";
import {Chat as ChatType, chatStore} from "@/stores/ChatStore"
import ChatMessage from "@/components/Chat/ChatMessage";
import {useRecoilState} from "recoil";
import {useThread} from "@/hooks/useThread";
import {usePage} from "@inertiajs/react";
import {useChat} from "@/hooks/useChat";
import BotThinking from "@/components/Chat/BotThinking";

const Chat = () => {
    const {chats, setChats, isSending, addMessage} = useChat();
    const {selectThread} = useThread();
    const pageProps = usePage().props;
    useEffect(() => {
        if (pageProps.empty_thread && chats.length == 1 && !isSending) {
            addMessage(chats[0].message, 'new_thread')
        }
        if (pageProps.messages) {
            setChats(pageProps.messages as ChatType[])
        }
        if (pageProps.thread_id) {
            selectThread(pageProps.thread_id as number)
        }
    }, [pageProps]);
    const scrollAreaRef = useRef<HTMLDivElement>(null)
    const scrollToBottomRef = useRef<HTMLDivElement>(null)
    useEffect(() => {
        if (scrollAreaRef.current) {
            scrollAreaRef.current.scrollTop = scrollAreaRef.current.scrollHeight
        }
        if (scrollToBottomRef.current) {
            scrollToBottomRef.current.scrollIntoView({behavior: 'smooth'})
        }
    }, [chats])
    return (
        <>
            <PanelLayout>
                <div
                    className={'w-full md:max-w-3xl lg:max-w-[40rem] xl:max-w-[48rem] mx-auto px-1 sm:px-4 pt-4 sm:pt-8 flex flex-col h-full justify-between'}>
                    <div className={'flex col'}>
                        <ScrollArea className="h-[80vh] sm:h-[75vh] px-4s pb-4 mb-4 w-full" ref={scrollAreaRef}>
                            {chats.map((message) => (
                                <ChatMessage key={message.id} message={message}/>
                            ))}
                            <div ref={scrollToBottomRef} className={''}></div>
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
