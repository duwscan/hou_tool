import {Card, CardContent, CardDescription, CardHeader, CardTitle} from "@/components/ui/card";
import {Input} from "@/components/ui/input";
import {Link, router} from "@inertiajs/react";
import {Button} from "@/components/ui/button";
import {z} from "zod";
import {zodResolver} from "@hookform/resolvers/zod";
import {Form, FormControl, FormDescription, FormField, FormItem, FormLabel, FormMessage} from "@/components/ui/form";
import {useForm as useReactHookForm} from "react-hook-form"
import {handleServerValidationErrors} from "@/lib/utils";
const LoginFormSchema = z.object({
    email: z.string({
        required_error: "Hãy nhập email của bạn",
    }).email({
        message: "Email không hợp lệ",
    }),
    password: z.string({
        required_error: "Hãy nhập mật khẩu của bạn",
    }),
})
export default function LoginForm() {
    const form = useReactHookForm<z.infer<typeof LoginFormSchema>>(
        {
            resolver: zodResolver(LoginFormSchema),
        }
    )
    const onSubmit = (data: z.infer<typeof LoginFormSchema>) => {
        router.post(route('login'), data, {
            onError: (errors) => {
                handleServerValidationErrors(errors, form)
            }
        })
    }
    return (
        <div className="flex items-center justify-center h-screen">
            <Card className="mx-auto max-w-sm">
                <CardHeader>
                    <CardTitle className="text-2xl">Đăng nhập</CardTitle>
                    <CardDescription>
                        Nhập email và mật khẩu của bạn để đăng nhập vào hệ thống
                    </CardDescription>
                </CardHeader>
                <CardContent>
                    <Form {...form}>
                        <form onSubmit={form.handleSubmit(onSubmit)}>
                            <div className="grid gap-4">
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
                                                <FormDescription>
                                                    <Link href="#" className="ml-auto inline-block text-sm underline">
                                                       Quên mật khẩu ?
                                                    </Link>
                                                </FormDescription>
                                            </FormItem>
                                        )}
                                    />
                                    <Button type="submit" className="w-full">
                                        Đăng nhập
                                    </Button>
                                </div>
                            </div>
                        </form>
                    </Form>
                    <div className="mt-4 text-center text-sm">
                       Chưa có tài khoản ?
                        <Link href={route('register')} className="underline">
                            Đăng ký ngay
                        </Link>
                    </div>
                </CardContent>
            </Card>
        </div>
        // <CommonForm></CommonForm>
    )
}
