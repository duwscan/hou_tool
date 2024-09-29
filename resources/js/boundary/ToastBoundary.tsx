import {router, usePage} from '@inertiajs/react'
import {toast} from "sonner";
import {useEffect} from "react";
import {Toaster} from "@/components/ui/sonner";

export type ToastBoundaryProps = {
    children: React.ReactNode;
}
type ToastType = 'success' | 'error' | 'info' | 'warning';

function handleToast(type: ToastType, message: string) {
    switch (type) {
        case "success":
            toast.success(message);
            break;
        case "error":
            toast.error(message);
            break;
        case "info":
            toast.info(message);
            break;
        case "warning":
            toast.warning(message);
            break;
    }
}

const ToastBoundary = () => {

    const props = usePage().props;
    useEffect(() => {
        return router.on('success', function (event) {
            // @ts-ignore
            const toast = event.detail.page.props?.toast;
            if (toast) {
                // @ts-ignore
                handleToast(toast.type, toast.message)
            }
        })
    }, [toast]);

    return (<>
            <Toaster/>
        </>
    );
}

export default ToastBoundary;
