import {useRecoilState, useRecoilValue} from "recoil";
import {chatStore} from "@/stores/ChatStore";
import {useThread} from "@/hooks/useThread";
import {router} from "@inertiajs/react";
import {selectedThread} from "@/stores/ThreadStore";
import {useState} from "react";

export function useChat() {
    const [chats, setChats] = useRecoilState(chatStore);
    const [isSending, setIsSending] = useState(false);
    const [selectedThreadId, _] = useRecoilState(selectedThread);

    function addMessage(message: string) {
        if (!selectedThreadId) return;
        setIsSending(true);
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
