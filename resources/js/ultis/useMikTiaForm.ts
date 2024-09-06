import {FormikConfig, FormikValues} from "formik/dist/types";
import {useFormik} from "formik";
import {useForm} from "@inertiajs/react";
import React from "react";

export interface HybridConfig<T extends FormikValues> extends FormikConfig<T> {
}
// combine inertiajs useForm and formik useFormik
// add more return props as it need in useFormik
export default function useMikTiaForm<T extends FormikValues>(initial: HybridConfig<T>) {
    const inertiaForm = useForm<T>(initial.initialValues);
    const formik = useFormik<T>(initial);
    return {
        values: formik.values,
        handleChange: formik.handleChange,
        handleSubmit: function (e?: React.FormEvent<HTMLFormElement> ) {
            inertiaForm.setData(formik.values);
            formik.handleSubmit(e);
        },
        ...inertiaForm,
    }
}
