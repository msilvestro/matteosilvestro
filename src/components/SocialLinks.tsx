import { useState } from "react"

import styles from "./SocialLinks.module.css"

type SocialLink = {
  name: string
  href: string
  description?: string
  color?: string
}

type Props = {
  socialLinks: Array<SocialLink>
}

const defaultDescription = "Hover on the links above to know more."

const ActiveLink = ({ socialLinks }: Props) => {
  const [description, setDescription] = useState(defaultDescription)

  return (
    <p>
      <ul className={styles.socialLinks}>
        {socialLinks.map((socialLink) => (
          <li key={socialLink.name}>
            <a
              href={socialLink.href}
              onMouseEnter={(e) =>
                setDescription(socialLink.description || defaultDescription)
              }
              onMouseLeave={(e) => setDescription(defaultDescription)}
            >
              <span>{socialLink.name}</span>
            </a>
            <style jsx>{`
              a:hover {
                background-color: ${socialLink.color};
                border-color: ${socialLink.color};
                border-bottom: 1px solid ${socialLink.color};
              }

              a > span {
                border-bottom: 1px solid black;
              }

              a:hover > span {
                border: none;
              }
            `}</style>
          </li>
        ))}
      </ul>
      <span>{description}</span>
    </p>
  )
}

export default ActiveLink
