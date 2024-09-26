import {Toaster} from "@/components/ui/toaster";
import {useToast} from "@/hooks/use-toast";
import {Page} from "@inertiajs/core";
import {useEffect} from "react";


export type ToastBoundaryProps = {
    flash?: unknown;
    children: React.ReactNode;
}
const ToastBoundary = ({children, flash}: ToastBoundaryProps) => {
    const {toast} = useToast();

    useEffect(() => {
        // @ts-ignore
        if (flash && (flash.success || flash.error)) {
            console.log(flash)
            // @ts-ignore
            if (flash.success && typeof flash.success === 'object') {
                // @ts-ignore
                Object.entries(flash.success).forEach(([key, value]) => {
                    toast({
                        variant: "success",
                        description: <p>{value as string}</p>,
                    })
                })
            } else { // @ts-ignore
                if (flash.error && typeof flash.error === 'object') {
                    // @ts-ignore
                    Object.entries(flash.success).forEach(([key, value]) => {
                        toast({
                            variant: "destructive",
                            description: <p>{value as string}</p>,
                        })
                    })
                }
            }
        }
    }, []);
    return (<>
            {children}
            <Toaster/>
        </>
    );
}

export default ToastBoundary;
