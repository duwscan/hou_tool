import { clsx, type ClassValue } from "clsx"
import { twMerge } from "tailwind-merge"
import {Path} from "react-hook-form";

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs))
}
export function handleServerValidationErrors<T>(errors: any, form: any) {
    Object.keys(errors).forEach((key) => {
        form.setError(key as Path<T>, {
            type: "server",
            message: errors[key],
        })
    });
}
