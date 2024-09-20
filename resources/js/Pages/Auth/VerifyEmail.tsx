import GuestLayout from '@/Layouts/GuestLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import {Head, Link, useForm} from '@inertiajs/react';
import React, {FormEventHandler} from 'react';
import TwoStepsBox from "@/Components/TwoStepsBox";
import {Button, Stack, Typography} from "@mui/material";

export default function VerifyEmail({status}: { status?: string }) {
    const {post, processing} = useForm({});

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('verification.send'));
    };

    return (
        <>
            <TwoStepsBox headerTitle="Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                    link we just emailed to you? If you didn't receive the email, we will gladly send you another."
                         subTitle={status === 'verification-link-sent' ? 'A new verification link has been sent to the email address you provided during registration.' : ''}>
                <Stack direction="row" spacing={1} mt={3}>
                    <Typography color="textSecondary" variant="h6" fontWeight="400">
                        Didn&apos;t get the code?
                    </Typography>
                    <Typography
                        href={"/"}
                        component={Link}
                        fontWeight="500"
                        onClick={submit}
                        sx={{
                            textDecoration: "none",
                            color: "primary.main",
                        }}
                    >
                        Resend
                    </Typography>
                </Stack>
            </TwoStepsBox>
        </>

    );
}
