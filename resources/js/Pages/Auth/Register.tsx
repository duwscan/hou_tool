import {FormEventHandler} from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/components/InputError';
import InputLabel from '@/components/InputLabel';
import PrimaryButton from '@/components/PrimaryButton';
import TextInput from '@/components/TextInput';
import {Head, Link, router, useForm} from '@inertiajs/react';
import {z} from "zod";
import {useForm as useReactHookForm} from "react-hook-form"
import {zodResolver} from "@hookform/resolvers/zod";
import {handleServerValidationErrors} from "@/lib/utils";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from "@/components/ui/card";
import {Form, FormControl, FormDescription, FormField, FormItem, FormLabel, FormMessage} from "@/components/ui/form";
import {Input} from "@/components/ui/input";
import {Button} from "@/components/ui/button";

const RegisterFormSchema = z.object({
    name: z.string({
        required_error: "Hãy nhập tên của bạn"
    }),
    email: z.string({
        required_error: "Hãy nhập email của bạn"
    }).email({
        message: "Email không hợp lệ"
    }).refine((email) => email.endsWith('@students.hou.edu.vn'), {
        message: "Email phải thuộc miền students.hou.edu.vn"
    }),
    password: z.string({
        required_error: "Hãy nhập mật khẩu của bạn"
    }).min(8, {
        message: "Mật khẩu phải chứa ít nhất 8 ký tự"
    }),
    password_confirmation: z.string({
        required_error: "Hãy xác nhận mật khẩu của bạn"
    }),
}).refine((data) => data.password === data.password_confirmation, {
    message: "Mật khẩu xác nhận không khớp",
    path: ["password_confirmation"],
})
export default function Register() {
    const form = useReactHookForm<z.infer<typeof RegisterFormSchema>>(
        {
            resolver: zodResolver(RegisterFormSchema),
        }
    );
    const onSubmit = (data: z.infer<typeof RegisterFormSchema>) => {
        router.post(route('register'), data, {
            onError: (errors) => {
                handleServerValidationErrors(errors, form)
            }
        })
    };

    return (
        <div className="flex items-center justify-center h-screen">
            <Card className="mx-auto max-w-sm">
                <CardHeader>
                    <CardTitle className="text-2xl">Đăng Kí</CardTitle>
                    <CardDescription>
                        Nhập thông tin của bạn để tạo tài khoản mới
                    </CardDescription>
                </CardHeader>
                <CardContent>
                    <Form {...form}>
                        <form onSubmit={form.handleSubmit(onSubmit)}>
                            <div className="grid gap-4">
                                <div className="grid gap-2">
                                    <FormField
                                        control={form.control}
                                        name="name"
                                        render={({field}) => (
                                            <FormItem>
                                                <FormLabel>Tên của bạn</FormLabel>
                                                <FormControl>
                                                    <Input placeholder="" {...field} />
                                                </FormControl>
                                                <FormMessage/>
                                            </FormItem>
                                        )}
                                    />
                                </div>
                                <div className="grid gap-2">
                                    <FormField
                                        control={form.control}
                                        name="email"
                                        render={({field}) => (
                                            <FormItem>
                                                <FormLabel>Email</FormLabel>
                                                <FormControl>
                                                    <Input placeholder="Email" {...field} />
                                                </FormControl>
                                                <FormDescription>Địa chỉ email HOU của bạn</FormDescription>
                                                <FormMessage/>
                                            </FormItem>
                                        )}
                                    />
                                </div>
                                <div className="grid gap-2">
                                    <FormField
                                        control={form.control}
                                        name="password"
                                        render={({field}) => (
                                            <FormItem>
                                                <FormLabel>Mật khẩu</FormLabel>
                                                <FormControl>
                                                    <Input placeholder="Password" {...field} type={"password"}/>
                                                </FormControl>
                                                <FormMessage/>
                                            </FormItem>
                                        )}
                                    />
                                </div>
                                <div className="grid gap-2">
                                    <FormField
                                        control={form.control}
                                        name="password_confirmation"
                                        render={({field}) => (
                                            <FormItem>
                                                <FormLabel>Xác nhận mật khẩu</FormLabel>
                                                <FormControl>
                                                    <Input placeholder="Nhập lại mật khẩu" {...field} type={"password"}/>
                                                </FormControl>
                                                <FormMessage/>
                                            </FormItem>
                                        )}
                                    />
                                    <Button type="submit" className="w-full">
                                            Đăng kí
                                    </Button>
                                </div>
                            </div>
                        </form>
                    </Form>
                    <div className="mt-4 text-center text-sm">
                        Đã có tài khoản ?
                        <Link href={route('login')} className="underline">
                            Đăng nhập
                        </Link>
                    </div>
                </CardContent>
            </Card>
        </div>
    );
}
