import { Typography, Stack } from '@mui/material';
import {Link} from "@inertiajs/react";
interface LinkType {
    href: string;
    title: string;
}

const pageLinks: LinkType[] = [
    {
        href: "/theme-pages/pricing",
        title: "Pricing Page",
    },
    {
        href: "/auth/auth1/login",
        title: "Authentication Design",
    },
    {
        href: "/auth/auth1/register",
        title: "Register Now",
    },
    {
        href: "/404",
        title: "404 Error Page",
    },
    {
        href: "/apps/note",
        title: "Notes App",
    },
    {
        href: "/apps/user-profile/profile",
        title: "User Application",
    },
    {
        href: "/apps/blog/post",
        title: "Blog Design",
    },
    {
        href: "/apps/ecommerce/checkout",
        title: "Shopping Cart",
    },
];
const QuickLinks = () => {
  return (
    <>
      <Typography variant="h5">Quick Links</Typography>
      <Stack spacing={2} mt={2}>
        {pageLinks.map((pagelink, index) => (
          <Link href={pagelink.href} key={index} className="hover-text-primary">
            <Typography
              variant="subtitle2"
              color="textPrimary"
              className="text-hover"
              fontWeight={600}
            >
              {pagelink.title}
            </Typography>
          </Link>
        ))}
      </Stack>
    </>
  );
};

export default QuickLinks;
