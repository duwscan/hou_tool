import { toast } from "sonner"
export const useHandleToastResponse = () => {
    // @ts-ignore
    function handleResponse({props}) {
        const {flash} = props;
        console.log(props);
        if (flash && (flash.success || flash.error)) {
            console.log(flash)
            // @ts-ignore
            if (flash.success && typeof flash.success === 'object') {
                // @ts-ignore
                Object.entries(flash.success).forEach(([key, value]) => {
                    toast.success(value as string);
                })
            } else { // @ts-ignore
                if (flash.error && typeof flash.error === 'object') {
                    // @ts-ignore
                    Object.entries(flash.success).forEach(([key, value]) => {
                        toast.error(value as string);
                    })
                }
            }
        }
    }
    function handleOnError(errors: any) {
        Object.entries(errors).forEach(([key, value]) => {
            toast.error(value as string);
        })
    }
    return {
        handleResponse,
        handleOnError,
    }
}
