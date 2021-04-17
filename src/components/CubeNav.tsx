import React, { FC } from "react"
import "./CubeNav.css"

type Side = {
  name: string
  onClick?(): void
}

type Props = {
  size: number
  fontSize?: string
  faceNames: {
    top: Side
    bottomLeft: Side
    bottomRight: Side
  }
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
        onClick={faceNames.top.onClick}
      >
        {faceNames.top.name}
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
          onClick={faceNames.bottomLeft.onClick}
        >
          {faceNames.bottomLeft.name}
        </div>
        <div
          className="face"
          style={{
            height: size,
            width: size,
            marginRight: (-size * (1 - cos30)) / 2,
            transform: `skewY(-30deg) scaleX(${cos30})`,
          }}
          onClick={faceNames.bottomRight.onClick}
        >
          {faceNames.bottomRight.name}
        </div>
      </div>
    </div>
  )
}

export default CubeNav
