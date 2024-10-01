import {atom, selector} from "recoil";

export interface Chat {
    id: number;
    message: string;
    sender: 'user' | 'bot';
    status?: 'sent' | 'sending' | 'failed';
}

export const chatStore = atom<Chat[]>({
    key: "chats",
    default: [] as Chat[],
});

