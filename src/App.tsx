import React from "react"
import "./App.css"

import persona_matt from "./assets/persona_matt.png"

import CubeNav from "./components/CubeNav"

const App = () => {
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
          <h2>Myself</h2>
          <blockquote>
            Good ideas don't take time. They take a lot of bad ideas first.
            <br />
            —Ral Zarek
          </blockquote>
          <p>
            I'm a scatterbrained wanderer always looking for new routes. My life
            is an adagio sostenuto in A minor played on a strange instrument.
          </p>
          <p>
            I seek beauty in the tidy lines of a source code, in the harmonious
            flow of notes in a music staff and in the refined perfection of a
            mathematical formula.
          </p>
          <p>
            If you want to know me, you can discover the different sides of
            myself though the nav cube on the left.
          </p>
          <section>
            <h3>Fun</h3>
            <p>
              In my free time I struggle to get bored, I have far too many
              hobbies, like enjoying a good story (whatever the medium) or
              building hopefully useful software.
            </p>
          </section>
          <section>
            <h3>Education</h3>
            <p>
              I studied mathematics because I always loved its problem-solving
              challenge and elegance in the solutions. I then fell in love with
              probability and statistics.
            </p>
          </section>
          <section>
            <h3>Work</h3>
            <p>
              I'm a developer with a mathematical background. I like to tackle a
              problem in an abstract manner and then implement it in code.
            </p>
          </section>
        </section>
      </div>
    </div>
  )
}

export default App
