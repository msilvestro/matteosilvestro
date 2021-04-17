import React, { useState, useEffect } from "react"
import "./App.css"

import markdownPage from "./pages/index.md"
import persona_matt from "./assets/persona_matt.png"

import ReactMarkdown from "react-markdown"

import CubeNav from "./components/CubeNav"

const App = () => {
  const [content, setContent] = useState<string | undefined>(undefined)

  useEffect(() => {
    fetch(markdownPage)
      .then((response) => response.text())
      .then((text) => setContent(text))
  }, [])

  return (
    <div className="website">
      <div className="title">
        <header>
          <h1>Matteo Silvestro</h1>
        </header>
      </div>
      <div className="main">
        <div className="sidebar">
          <div className="profile-picture selected">
            <img src={persona_matt} alt="Profile" />
          </div>
          <nav>
            <CubeNav
              size={80}
              fontSize="1.2em"
              faceNames={{
                top: "Fun",
                bottomLeft: "Work",
                bottomRight: "Edu",
              }}
              margin={10}
            />
          </nav>
        </div>
        <section className="content">
          {content && <ReactMarkdown>{content}</ReactMarkdown>}
        </section>
      </div>
    </div>
  )
}

export default App
