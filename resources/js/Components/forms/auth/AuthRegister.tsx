import {Box, Typography, Button, Divider} from "@mui/material";
import Link from "next/link";
import {Stack} from "@mui/system";
import {registerType} from "@/types/auth/auth";
import AuthSocialButtons from "./AuthSocialButtons";
import CustomFormLabel from "@/Components/forms/theme-elements/CustomFormLabel";
import CustomTextField from "@/Components/forms/theme-elements/CustomTextField";
import useMikTiaForm from "@/ultis/useMikTiaForm";
import React from "react";

const AuthRegister = ({title, subtitle, subtext}: registerType) => {
    const {values, post, processing, errors, reset, handleSubmit, handleChange} = useMikTiaForm({
        initialValues: {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        },
        onSubmit: (values) => {
            post(route('register'), {
                onFinish: () => reset('password'),
            });
        }
    })
    return (
        <>
            {title ? (
                <Typography fontWeight="700" variant="h3" mb={1}>
                    {title}
                </Typography>
            ) : null}

            {subtext}
            <AuthSocialButtons title="Sign up with"/>

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
                        or sign up with
                    </Typography>
                </Divider>
            </Box>
            <form onSubmit={handleSubmit}>
                <Box>
                    <Stack mb={3}>
                        <CustomFormLabel htmlFor="name">Name</CustomFormLabel>
                        <CustomTextField
                            id="name"
                            variant="outlined"
                            value={values.name}
                            onChange={handleChange}
                            error={Boolean(errors.name)}
                            helperText={Boolean(errors.name) && errors.name}
                            fullWidth
                        />
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
                        <CustomFormLabel htmlFor="password">Password</CustomFormLabel>
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
                        <CustomFormLabel htmlFor="password_confirmation">Confirm Password</CustomFormLabel>
                        <CustomTextField
                            fullWidth
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            value={values.password_confirmation}
                            onChange={handleChange}
                            error={Boolean(errors.password_confirmation)}
                            helperText={Boolean(errors.password_confirmation) && errors.password_confirmation}
                        />
                    </Stack>
                    <Button
                        disabled={processing}
                        color="primary"
                        type="submit"
                        variant="contained"
                        size="large"
                        fullWidth
                    >
                        Sign Up
                    </Button>
                </Box>
            </form>
            {subtitle}
        </>
    )
};

export default AuthRegister;
