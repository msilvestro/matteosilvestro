import React from "react"
import "./App.css"

import CubeNav from "./components/CubeNav"

const App = () => {
  return (
    <div className="website">
      <header>
        <h1>Matteo Silvestro</h1>
      </header>
      <div className="content">
        <header>Projects</header>
        <section>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
            pharetra, lacus ut cursus fermentum, nunc risus commodo dui, ut
            porta augue lectus vel nunc. Nullam sit amet nulla gravida metus
            pretium ullamcorper nec quis erat. Vestibulum dapibus vulputate
            odio, ac laoreet enim consectetur ut. Vestibulum viverra augue vitae
            dui aliquet aliquet. Donec tincidunt massa orci, ut eleifend urna
            tempus quis. Aliquam placerat efficitur leo. Integer ultricies
            gravida lacus, id egestas quam accumsan ut. Curabitur tempus elit ut
            augue facilisis mollis. Cras in quam at lacus pretium egestas eget
            sed mauris. Mauris mollis, urna sed auctor porta, nibh libero
            viverra ante, in auctor tellus neque a neque. Mauris quis tortor sed
            turpis pretium viverra id sit amet nisi. Fusce molestie mollis
            risus, in gravida nisi aliquam consectetur.
          </p>
        </section>
      </div>
      <CubeNav
        size={80}
        fontSize="1.2em"
        faceNames={{ top: "Fun", bottomLeft: "Work", bottomRight: "Edu" }}
        margin={10}
      />
    </div>
  )
}

export default App
