import {Link, usePage} from "@inertiajs/react";
import {Button} from "@/components/ui/button";
import {PanelLeft, Search, Settings} from "lucide-react";
import {Sheet, SheetContent, SheetTrigger} from "@/components/ui/sheet";
import {Input} from "@/components/ui/input";
import React, {useEffect} from "react";
import ToastBoundary from "@/boundary/ToastBoundary";
import SideBar from "./SideBar";
import {useRecoilState} from "recoil";
import {Thread, threadStore} from "@/stores/ThreadStore";

const PanelLayout = ({children}: { children: React.ReactNode }) => {
    const {listUserThreads} = usePage().props;
    const [_, setThreads] = useRecoilState<Thread[]>(threadStore);
    useEffect(() => {
        setThreads(listUserThreads as Thread[]);
    }, [listUserThreads]);
    return (
        <div className="flex min-h-screen w-full bg-muted/40">
            <aside className="inset-y-0 left-0 z-10 hidden w-fit flex-col border-r bg-background md:flex">
                <SideBar/>
            </aside>
            <div className="flex flex-col md:gap-4 md:pt-4  min-h-screen flex-1">
                <header
                    className="sticky top-0 z-30 flex h-14 items-center gap-4 border-b bg-background px-4 md:static md:h-auto md:border-0 md:bg-transparent md:px-6">
                    <Sheet>
                        <SheetTrigger asChild>
                            <Button size="icon" variant="outline" className="md:hidden">
                                <PanelLeft className="h-5 w-5"/>
                                <span className="sr-only">Toggle Menu</span>
                            </Button>
                        </SheetTrigger>
                        <SheetContent side="left" className={'p-0 m-0 w-fit'}>
                            <SideBar/>
                        </SheetContent>
                    </Sheet>
                    <div className="relative ml-auto flex-1 md:grow-0">
                        <Search className="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground"/>
                        <Input
                            type="search"
                            placeholder="Search..."
                            className="w-full rounded-lg bg-background pl-8 md:w-[200px] lg:w-[320px]"
                        />
                    </div>
                    <Button>
                        <Link href={route('threads.index')}>
                            Đoạn chat mới
                        </Link>
                    </Button>
                </header>
                <main className="grid flex-1 items-start gap-4 p-4 md:px-6 md:py-0 md:gap-8">
                    {children}
                    <ToastBoundary/>
                </main>
            </div>
        </div>
    )
}
export default PanelLayout;
