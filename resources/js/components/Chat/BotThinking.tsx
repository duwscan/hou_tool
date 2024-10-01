import { useState, useEffect } from 'react'

export default function BotThinking() {
    const [dots, setDots] = useState('')

    useEffect(() => {
        const interval = setInterval(() => {
            setDots(prev => prev.length < 3 ? prev + '.' : '')
        }, 500)

        return () => clearInterval(interval)
    }, [])

    return (
        <div className="inline-flex items-center space-x-2 text-sm text-muted-foreground bg-muted px-3 py-1 rounded-full">
            <div className="w-2 h-2 bg-primary rounded-full animate-pulse" />
            <span>Đang suy nghĩ{dots}</span>
        </div>
    )
}
