import {Button, Stack} from "@mui/material";
import CustomFormLabel from "@/Components/forms/theme-elements/CustomFormLabel";
import CustomTextField from "@/Components/forms/theme-elements/CustomTextField";
import {Link} from "@inertiajs/react";
import useMikTiaForm from "@/ultis/useMikTiaForm";

export default function AuthForgotPassword() {
    const {values, post, processing, errors, handleSubmit, handleChange} = useMikTiaForm({
        initialValues: {
            email: ''
        },
        onSubmit(values) {
            post(route('password.email'));
        }
    });
    return (
        <>
            <form onSubmit={handleSubmit}>
                <Stack mt={4} spacing={2}>
                    <CustomFormLabel htmlFor="email">Email Adddress</CustomFormLabel>
                    <CustomTextField
                        fullWidth
                        id="email"
                        name="email"
                        type="text"
                        value={values.email}
                        onChange={handleChange}
                        error={Boolean(errors.email)}
                        helperText={Boolean(errors.email) && errors.email}
                    />
                    <Button
                        disabled={processing}
                        color="primary"
                        variant="contained"
                        size="large"
                        fullWidth
                        type={"submit"}
                    >
                        Forgot Password
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
        </>
    )
};
