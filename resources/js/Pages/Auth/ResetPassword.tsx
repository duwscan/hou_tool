import {Head, Link, useForm} from '@inertiajs/react';
import TwoStepsBox from "@/Components/TwoStepsBox";
import useMikTiaForm from "@/ultis/useMikTiaForm";
import {Button, Stack} from "@mui/material";
import CustomFormLabel from "@/Components/forms/theme-elements/CustomFormLabel";
import CustomTextField from "@/Components/forms/theme-elements/CustomTextField";

export default function ResetPassword({token, email}: { token: string, email: string }) {
    const {values, post, processing, errors, reset, handleSubmit, handleChange} = useMikTiaForm({
        initialValues: {
            token: token,
            email: email,
            password: '',
            password_confirmation: '',
        },
        onSubmit: (values) => {
            post(route('password.store'), {
                onFinish: () => reset('password', 'password_confirmation'),
            });
        }
    });

    return (
        <TwoStepsBox
            headerTitle="Reset Password"
            subTitle="Enter your new password"
        >
            <form onSubmit={handleSubmit}>
                <Stack mt={4} spacing={2}>
                    <CustomFormLabel htmlFor="email">Email</CustomFormLabel>
                    <CustomTextField
                        fullWidth
                        id="email"
                        readOnly
                        name="email"
                        type="text"
                        value={values.email}
                        error={Boolean(errors.email)}
                        helperText={Boolean(errors.email) && errors.email}
                    />
                    <CustomFormLabel htmlFor="password">Password</CustomFormLabel>
                    <CustomTextField
                        fullWidth
                        id="password"
                        name="password"
                        type="text"
                        value={values.password}
                        onChange={handleChange}
                        error={Boolean(errors.password)}
                        helperText={Boolean(errors.password) && errors.password}
                    />
                    <CustomFormLabel htmlFor="password_confirmation">Password Confirmation</CustomFormLabel>
                    <CustomTextField
                        fullWidth
                        id="password_confirmation"
                        name="password_confirmation"
                        type="text"
                        value={values.password_confirmation}
                        onChange={handleChange}
                        error={Boolean(errors.password_confirmation)}
                        helperText={Boolean(errors.password_confirmation) && errors.password_confirmation}
                    />
                    <Button
                        disabled={processing}
                        color="primary"
                        variant="contained"
                        size="large"
                        fullWidth
                        type={"submit"}
                    >
                        Reset Password
                    </Button>
                    <Button
                        color="primary"
                        size="large"
                        fullWidth
                        component={Link}
                        href={route('login')}
                    >
                        Back to Login
                    </Button>
                </Stack>
            </form>
        </TwoStepsBox>
    );
}
