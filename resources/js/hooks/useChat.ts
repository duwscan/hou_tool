import {useRecoilState, useRecoilValue} from "recoil";
import {chatStore} from "@/stores/ChatStore";
import {useThread} from "@/hooks/useThread";
import {router, usePage} from "@inertiajs/react";
import {selectedThread} from "@/stores/ThreadStore";
import {useState} from "react";

export function useChat() {
    const [chats, setChats] = useRecoilState(chatStore);
    const [isSending, setIsSending] = useState(false);
    const [selectedThreadId, _] = useRecoilState(selectedThread);
    function addMessage(message: string, status : string = 'sending' ) {
        setIsSending(true);
        if (!selectedThreadId) {
            console.log('empty thread');
            setChats([{
                id: chats.length + 1,
                message,
                sender: 'user',
                status: 'sending',
            }]);
            if(status === 'new_thread'){
                router.post(route('threads.store'), {message}, {
                    onSuccess: (response) => {
                        setIsSending(false);
                    }
                })
                return;
            }
            router.get(route('threads.index'), {empty_thread: true});
            return;
        }
        setChats([...chats, {
            id: chats.length + 1,
            message,
            sender: 'user',
            status: 'sending',
        }]);
        router.post(route('threads.chats.store', selectedThreadId), {message}, {
            onSuccess: (response) => {
                setIsSending(false);
            }
        });
    }

    return {
        chats,
        setChats,
        addMessage,
        isSending,
    };
}
