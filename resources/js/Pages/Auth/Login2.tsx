import {Link, useForm} from '@inertiajs/react'
import {Grid, Box, Card, Stack, Typography} from '@mui/material';

// components
import PageContainer from '@/Components/container/PageContainer';
import AuthLogin from './AuthLogin';
import Main from "@/Layouts/Main";
import {FormEventHandler} from "react";

interface LoginPageProps {
    status?: string;
    canResetPassword: boolean;
}

export default function Login({status, canResetPassword}: LoginPageProps) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route('login'), {
            onFinish: () => reset('password'),
        });
    };
    return (
        <Main>
            <PageContainer title="Login Page" description="this is Sample page">
                <Box
                    sx={{
                        position: 'relative',
                        '&:before': {
                            content: '""',
                            background: 'radial-gradient(#d2f1df, #d3d7fa, #bad8f4)',
                            backgroundSize: '400% 400%',
                            animation: 'gradient 15s ease infinite',
                            position: 'absolute',
                            height: '100%',
                            width: '100%',
                            opacity: '0.3',
                        },
                    }}
                >
                    <Grid container spacing={0} justifyContent="center" sx={{height: '100vh'}}>
                        <Grid
                            item
                            xs={12}
                            sm={12}
                            lg={5}
                            xl={4}
                            display="flex"
                            justifyContent="center"
                            alignItems="center"
                        >
                            <Card elevation={9} sx={{p: 4, zIndex: 1, width: '100%', maxWidth: '450px'}}>
                                <Box display="flex" alignItems="center" justifyContent="center">
                                    {/*<Logo />*/}
                                    LOGO HERE
                                </Box>
                                <AuthLogin
                                    canResetPassword={canResetPassword}
                                    subtitle={
                                        <Stack direction="row" spacing={1} justifyContent="center" mt={3}>
                                            <Typography color="textSecondary" variant="h6" fontWeight="500">
                                                New to Modernize?
                                            </Typography>
                                            <Typography
                                                component={Link}
                                                href="/auth/auth2/register"
                                                fontWeight="500"
                                                sx={{
                                                    textDecoration: 'none',
                                                    color: 'primary.main',
                                                }}
                                            >
                                                Create an account
                                            </Typography>
                                        </Stack>
                                    }
                                />
                            </Card>
                        </Grid>
                    </Grid>
                </Box>
            </PageContainer>

        </Main>
    );
};