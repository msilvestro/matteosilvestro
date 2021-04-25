import type { AppProps } from "next/app"
import Link from "next/link"
import Image from "next/image"

import CubeNav from "../components/CubeNav"

import "../styles.css"

function MyApp({ Component, pageProps }: AppProps) {
  return (
    <div className="website">
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
                <Link href="/">
                  <div className="profile-picture">
                    <Image
                      src="/persona_matt.png"
                      alt="Home"
                      width={142}
                      height={142}
                    />
                  </div>
                </Link>
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
            <Component {...pageProps} />
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
