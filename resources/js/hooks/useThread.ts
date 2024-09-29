import {useRecoilState, useRecoilValue} from "recoil";
import {groupThreads, selectedThread, Thread, threadStore} from "@/stores/ThreadStore";
import {router} from "@inertiajs/react";

export const useThread = () => {
    const [threads, setThreads] = useRecoilState(threadStore);
    const [_, setSelectedThreadId] = useRecoilState(selectedThread);

    function selectThread(id: number) {
        setSelectedThreadId(id);
    }

    function renameThread(id: number, name: string) {
        router.put(route('threads.update', id), {thread_name: name});
    }

    function deleteThread(id: number) {
        router.delete(route('threads.destroy', id));
    }

    return {
        renameThread,
        deleteThread,
        selectThread,
    };
}
