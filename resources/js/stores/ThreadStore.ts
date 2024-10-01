import {atom, selector} from "recoil";
import moment from 'moment';

export interface Thread {
    id: number;
    thread_name: string;
    created_at: string;
    selected?: boolean;
}

export interface ThreadGroup {
    title: string;
    items: { id: number, thread_name: string, selected: boolean }[]
}

// Function to format month
const formatMonth = (date: moment.Moment) => {
    return date.format('MMMM'); // e.g., "September"
};

// Function to get the title based on date
const getTitleByDate = (created_at: string): string => {
    const currentDate = moment(); // Current date
    const threadDate = moment(created_at); // Parse thread date
    const dayDiff = currentDate.diff(threadDate, 'days'); // Difference in days

    // Categorize into "Today", "Previous 30 Days", or the month
    if (dayDiff === 0) {
        return 'Today';
    } else if (dayDiff === 1) {
        return 'Yesterday';
    } else if (dayDiff <= 30) {
        return 'Previous 30 Days';
    } else if (threadDate.isSame(currentDate, 'year')) {
        return formatMonth(threadDate); // Return month if it's within the same year
    } else {
        return `${formatMonth(threadDate)} ${threadDate.format('YYYY')}`; // Return month + year if different years
    }
};
export const threadStore = atom<Thread[]>({
    key: "threads",
    default: [] as Thread[],
});
export const groupThreads = selector({
    key: "groupThreads",
    get: ({get}) => {
        const threads = get(threadStore);
        return threads.reduce((acc, thread) => {
            const title = getTitleByDate(thread.created_at);
            // Find or create the group for the title
            let group = acc.find(g => g.title === title);
            if (!group) {
                group = {title: title, items: []};
                acc.push(group);
            }

            // Add the thread to the relevant group
            group.items.push({
                id: thread.id,
                thread_name: thread.thread_name,
                selected: thread.selected || false,
            });
            return acc;
        }, [] as ThreadGroup[]);
    },
})

export const selectedThread = atom<number | null>({
    key: "thread_id",
    default: null,
});
