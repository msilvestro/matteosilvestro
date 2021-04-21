import React from "react"
import { useRoutes, ActiveLink, Redirect } from "raviger"

import "./App.css"
import persona_matt from "./assets/persona_matt.png"

import CubeNav from "./components/CubeNav"
import MarkdownContent from "./components/MarkdownContent"

import { getPage } from "./pages"

const routes = {
  "/": () => <MarkdownContent file={getPage("home")} />,
  "/home": () => <Redirect to="/" />,
  "/:pageName": ({ pageName }: { [k: string]: string }) => (
    <MarkdownContent file={getPage(pageName)} />
  ),
  "*": () => <MarkdownContent file={getPage("404")} />,
}

const App = () => {
  const route = useRoutes(routes)

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
                <ActiveLink href="/" exactActiveClass="selected">
                  <div className="profile-picture">
                    <img src={persona_matt} alt="Home" />
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
        <section className="content">{route}</section>
      </div>
    </div>
  )
}

export default App
