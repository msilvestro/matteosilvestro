import React, { FC } from "react"
import "./CubeNav.css"

type FaceNames = {
  top: string
  bottomLeft: string
  bottomRight: string
}

type Props = {
  size: number
  fontSize?: string
  faceNames: FaceNames
  margin?: number
}

const cos30 = Math.cos(Math.PI / 6)
const sin30 = Math.sin(Math.PI / 6)

const CubeNav: FC<Props> = ({
  size,
  fontSize = "1em",
  faceNames,
  margin = 0,
}: Props) => {
  return (
    <div
      className="cube"
      style={{
        fontSize,
        paddingBottom: (size * sin30) / 2,
      }}
    >
      <div
        className="face"
        style={{
          height: size,
          width: size,
          marginLeft: (size + margin) / 2 - size * (1 - cos30),
          marginBottom: -size * sin30 * 0.5 + margin,
          transform: `rotate(-30deg) skewX(30deg) scaleY(${cos30})`,
        }}
      >
        {faceNames.top}
      </div>
      <div className="bottom-faces">
        <div
          className="face"
          style={{
            height: size,
            width: size,
            marginLeft: (-size * (1 - cos30)) / 2,
            marginRight: -size * (1 - cos30) + margin,
            transform: `skewY(30deg) scaleX(${cos30})`,
          }}
        >
          {faceNames.bottomLeft}
        </div>
        <div
          className="face"
          style={{
            height: size,
            width: size,
            marginRight: (-size * (1 - cos30)) / 2,
            transform: `skewY(-30deg) scaleX(${cos30})`,
          }}
        >
          {faceNames.bottomRight}
        </div>
      </div>
    </div>
  )
}

export default CubeNav
