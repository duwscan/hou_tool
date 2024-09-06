export interface registerType {
    title?: string;
    subtitle?: JSX.Element | JSX.Element[];
    subtext?: JSX.Element | JSX.Element[];
}
export interface LoginPageProps {
    status?: string;
    canResetPassword: boolean;
}
export interface loginType extends LoginPageProps{
    title?: string;
    subtitle?: JSX.Element | JSX.Element[];
    subtext?: JSX.Element | JSX.Element[];
}

export interface signInType {
    title?: string;
}
