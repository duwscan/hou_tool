import TwoStepsBox from "@/Components/TwoStepsBox";
import AuthForgotPassword from "@/Components/forms/auth/AuthForgotPassword";

export default function ForgotPassword({status}: { status?: string }) {
    return (
        <TwoStepsBox
            headerTitle={"Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one."}
            subTitle={status}
        >
            <AuthForgotPassword/>
        </TwoStepsBox>
    )
}
