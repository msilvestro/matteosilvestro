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
}

const CubeNav: FC<Props> = ({ size, fontSize = "1em", faceNames }: Props) => {
  return (
    <div className="cube" style={{ fontSize }}>
      <div
        className="face top"
        style={{
          height: `${size}px`,
          width: `${size}px`,
          marginLeft: `${size / 2}px`,
          marginBottom: `-${size / 9}px`,
        }}
      >
        {faceNames.top}
      </div>
      <div className="bottom-faces">
        <div
          className="face bottom-left"
          style={{ height: `${size}px`, width: `${size}px` }}
        >
          {faceNames.bottomLeft}
        </div>
        <div
          className="face bottom-right"
          style={{ height: `${size}px`, width: `${size}px` }}
        >
          {faceNames.bottomRight}
        </div>
      </div>
    </div>
  )
}

export default CubeNav
