import { AnchorHTMLAttributes } from "react"
import type { AppProps } from "next/app"
import Head from "next/head"
import Link from "next/link"
import Image from "next/image"
import { useRouter } from "next/router"
import { MDXProvider } from "@mdx-js/react"

import CubeNav from "../components/CubeNav"
import ActiveLink from "../components/ActiveLink"

import "../styles.css"

const components = {
  a: ({ href, children, ...props }: AnchorHTMLAttributes<HTMLAnchorElement>) =>
    href && href[0] === "/" ? (
      <Link href={href}>{children}</Link>
    ) : (
      <a href={href} {...props}>
        {children}
      </a>
    ),
}

const getTitle = (route: string) => {
  const baseTitle = "Matteo Silvestro"
  const separator = "~"
  switch (route) {
    case "/fun":
      return `${baseTitle} ${separator} Fun`
    case "/work":
      return `${baseTitle} ${separator} Work`
    case "/education":
      return `${baseTitle} ${separator} Education`
    default:
      return baseTitle
  }
}

function MyApp({ Component, pageProps }: AppProps) {
  const router = useRouter()

  return (
    <div className="website">
      <Head>
        <title>{getTitle(router.route)}</title>
      </Head>
      <div className="title">
        <header>
          <h1>Matteo Silvestro</h1>
        </header>
      </div>
      <div className="main">
        <div className="sidebar">
          <nav>
            <ul>
              <li>
                <ActiveLink href="/">
                  <div className="profile-picture">
                    <Image
                      src="/persona_matt.png"
                      alt="Profile picture"
                      width={142}
                      height={142}
                    />
                  </div>
                </ActiveLink>
              </li>
              <CubeNav
                size={80}
                fontSize="1.2em"
                faceNames={{
                  top: {
                    name: "Fun",
                    path: "/fun",
                  },
                  bottomLeft: {
                    name: "Work",
                    path: "/work",
                  },
                  bottomRight: {
                    name: "Edu",
                    path: "/education",
                  },
                }}
                margin={10}
              />
            </ul>
          </nav>
        </div>
        <div className="content">
          <section>
            <MDXProvider components={components}>
              <Component {...pageProps} />
            </MDXProvider>
          </section>
          <footer>
            ©2021 Matteo Silvestro — version <abbr title="iota">&iota;</abbr>
          </footer>
        </div>
      </div>
    </div>
  )
}

export default MyApp
