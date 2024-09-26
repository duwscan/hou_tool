import {Control, FieldPath, FieldValues} from "react-hook-form";
import {FormControl, FormDescription, FormField, FormItem, FormLabel, FormMessage} from "@/components/ui/form";
import React from "react";
export interface AppFormItemProps<T extends FieldValues, TName extends FieldPath<T> = FieldPath<T>> {
    setData?: (key : any,value : any) => void;
    control: Control<T>;
    name: TName;
    label?: string;
    description?: string;
    placeholder?: string;
    children: React.ReactNode;
}

export function AppFormItem<T extends FieldValues, TName extends FieldPath<T> = FieldPath<T>>(props: AppFormItemProps<T, TName>) {
    function handleChange(e: React.ChangeEvent<HTMLInputElement>) {
        props.setData && props.setData(props.name, e.target.value);
    }
    return <>
        <FormField
            control={props.control}
            name={props.name}
            render={({field}) => (
                <FormItem>
                    <FormLabel>{props.label}</FormLabel>
                    <FormControl>
                       {React.cloneElement(props.children as React.ReactElement, { placeholder: props.placeholder, ...field })}
                    </FormControl>
                    {props.description && (
                        <FormDescription>
                            {props.description}
                        </FormDescription>
                    )}
                    <FormMessage>
                    </FormMessage>
                </FormItem>
            )}
        />
    </>
}
