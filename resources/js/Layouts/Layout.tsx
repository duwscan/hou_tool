"use client";
import Box from "@mui/material/Box";
import Container from "@mui/material/Container";
import { styled, useTheme } from "@mui/material/styles";
import Header from "@/Components/layouts/vertical/header/Header";
import Navigation from "@/Components/layouts/horizontal/navbar/Navigation";
import HorizontalHeader from "@/Components/layouts/horizontal/header/Header";
import { useSelector } from "@/store/hooks";
import { AppState } from "@/store/store";

const MainWrapper = styled("div")(() => ({
  display: "flex",
  minHeight: "100vh",
  width: "100%",
}));

const PageWrapper = styled("div")(() => ({
  display: "flex",
  flexGrow: 1,
  paddingBottom: "60px",
  flexDirection: "column",
  zIndex: 1,
  width: "100%",
  backgroundColor: "transparent",
}));

interface Props {
  children: React.ReactNode;
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  const customizer = useSelector((state: AppState) => state.customizer);
  const theme = useTheme();

  return (
    <MainWrapper>
      <PageWrapper
        className="page-wrapper"
        sx={{
          ...(customizer.isCollapse && {
            [theme.breakpoints.up("lg")]: {
              ml: `${customizer.MiniSidebarWidth}px`,
            },
          }),
        }}
      >
        {customizer.isHorizontal ? <HorizontalHeader /> : <Header />}
        {customizer.isHorizontal ? <Navigation /> : ""}
        <Container
          sx={{
            maxWidth: "100%!important",
          }}
        >
          {/* ------------------------------------------- */}
          {/* PageContent */}
          {/* ------------------------------------------- */}

          <Box sx={{ minHeight: "calc(100vh - 170px)" }}>
            {/* <Outlet /> */}
            {children}
            {/* <Index /> */}
          </Box>
        </Container>
      </PageWrapper>
    </MainWrapper>
  );
}
