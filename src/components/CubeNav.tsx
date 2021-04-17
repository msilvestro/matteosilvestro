import React, { FC, CSSProperties } from "react"
import "./CubeNav.css"

import { toggleClass } from "../utils/css"

type Side = {
  name: string
  onClick?(): void
  selected?: boolean
}

type SideProps = {
  side: Side
  style: CSSProperties
}

const CubeSide: FC<SideProps> = ({ side, style }: SideProps) => {
  return (
    <div
      className={"face" + toggleClass("selected", side.selected || false)}
      style={style}
      onClick={side.onClick}
    >
      {side.name}
    </div>
  )
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
      <CubeSide
        side={faceNames.top}
        style={{
          height: size,
          width: size,
          marginLeft: (size + margin) / 2 - size * (1 - cos30),
          marginBottom: -size * sin30 * 0.5 + margin,
          transform: `rotate(-30deg) skewX(30deg) scaleY(${cos30})`,
        }}
      />
      <div className="bottom-faces">
        <CubeSide
          side={faceNames.bottomLeft}
          style={{
            height: size,
            width: size,
            marginLeft: (-size * (1 - cos30)) / 2,
            marginRight: -size * (1 - cos30) + margin,
            transform: `skewY(30deg) scaleX(${cos30})`,
          }}
        />
        <CubeSide
          side={faceNames.bottomRight}
          style={{
            height: size,
            width: size,
            marginRight: (-size * (1 - cos30)) / 2,
            transform: `skewY(-30deg) scaleX(${cos30})`,
          }}
        />
      </div>
    </div>
  )
}

export default CubeNav
