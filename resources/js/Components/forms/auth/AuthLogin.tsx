import {
    Box,
    Typography,
    FormGroup,
    FormControlLabel,
    Button,
    Stack,
    Divider, FormHelperText,
} from "@mui/material";
import Link from "next/link";
import {loginType} from "@/types/auth/auth";
import CustomCheckbox from "@/Components/forms/theme-elements/CustomCheckbox";
import CustomTextField from "@/Components/forms/theme-elements/CustomTextField";
import CustomFormLabel from "@/Components/forms/theme-elements/CustomFormLabel";
import AuthSocialButtons from "./AuthSocialButtons";
import {useForm} from "@inertiajs/react";
import React, {FormEventHandler, useEffect} from "react";
import {useFormik} from "formik";
import useMikTiaForm from "@/ultis/useMikTiaForm";

interface LoginRequest {
    email: string;
    password: string;
    remember: boolean;
}

const AuthLogin = ({title, subtitle, subtext, status, canResetPassword}: loginType) => {
    const {values, post, processing, errors, reset, handleSubmit, handleChange} = useMikTiaForm<LoginRequest>({
        initialValues: {
            email: '',
            password: '',
            remember: false,
        },
        onSubmit: (values) => {
            post(route('login'), {
                onFinish: () => reset('password'),
            });
        }
    })
    return <>
        {title ? (
            <Typography fontWeight="700" variant="h3" mb={1}>
                {title}
            </Typography>
        ) : null}

        {subtext}

        <AuthSocialButtons title="Sign in with"/>
        <Box mt={3}>
            <Divider>
                <Typography
                    component="span"
                    color="textSecondary"
                    variant="h6"
                    fontWeight="400"
                    position="relative"
                    px={2}
                >
                    or sign in with
                </Typography>
            </Divider>
        </Box>

        <form onSubmit={handleSubmit}>
            <Stack>
                <Box>
                    <CustomFormLabel>Email Address</CustomFormLabel>
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
                </Box>
                <Box>
                    <CustomFormLabel>Password</CustomFormLabel>
                    <CustomTextField
                        fullWidth
                        id="password"
                        name="password"
                        type="password"
                        value={values.password}
                        onChange={handleChange}
                        error={Boolean(errors.password)}
                        helperText={Boolean(errors.password) && errors.password}
                    />
                </Box>
                <Stack
                    justifyContent="space-between"
                    direction="row"
                    alignItems="center"
                    my={2}
                >
                    <FormGroup>
                        <FormControlLabel
                            control={<CustomCheckbox
                                onChange={handleChange}
                                value={values.remember}
                                defaultChecked
                            />}
                            label="Remeber this Device"
                        />
                    </FormGroup>
                    {canResetPassword &&
                        (
                            <Typography
                                component={Link}
                                href={route('password.request')}
                                fontWeight="500"
                                sx={{
                                    textDecoration: "none",
                                    color: "primary.main",
                                }}
                            >
                                Forgot Password ?
                            </Typography>
                        )
                    }
                </Stack>
            </Stack>
            <Box>
                <Button
                    color="primary"
                    variant="contained"
                    size="large"
                    fullWidth
                    disabled={processing}
                    type="submit"
                >
                    Sign In
                </Button>
            </Box>
        </form>

        {subtitle}
    </>
};

export default AuthLogin;
