"use client"

import { Button } from "@/components/ui/button"
import { badgeVariants } from "@/components/ui/badge"
import {ArrowUpCircle } from "lucide-react"
import Composer from "@/components/Composer";
import {Link} from "@inertiajs/react";
import {MdArrowOutward} from "react-icons/md";

export default function ChatHero() {
    return (
        <div className="w-full max-w-3xl mx-auto px-4 py-8 flex flex-col h-full">
            <div className={`flex-grow flex flex-col justify-center`}>
                <div className="pt-6">
                    <h1 className="text-4xl font-bold text-center mb-2">What can I help you ship?</h1>
                    <p className="text-center text-muted-foreground mb-8">
                        Generate UI, ask questions, debug, execute code, and much more.
                    </p>
                    <Composer />
                    <div className="flex flex-wrap justify-center gap-2">
                        <Link className={badgeVariants({variant: "outline"})} href={""}>
                            Generate a sticky header
                            <MdArrowOutward />
                        </Link>
                        <Link className={badgeVariants({variant: "outline"})} href={""}>
                            Generate a sticky header
                            <MdArrowOutward />
                        </Link>
                        <Link className={badgeVariants({variant: "outline"})} href={""}>
                            Generate a sticky header
                            <MdArrowOutward />
                        </Link>
                        <Link className={badgeVariants({variant: "outline"})} href={""}>
                            Generate a sticky header
                            <MdArrowOutward />
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    )
}
