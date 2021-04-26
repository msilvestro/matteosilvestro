import styles from "./SocialLinks.module.css"

type SocialLink = {
  name: string
  href: string
  color?: string
}

type Props = {
  socialLinks: Array<SocialLink>
}

const ActiveLink = ({ socialLinks }: Props) => {
  return (
    <p>
      <ul className={styles.socialLinks}>
        {socialLinks.map((socialLink) => (
          <li key={socialLink.name}>
            <a href={socialLink.href}>{socialLink.name}</a>
          </li>
        ))}
      </ul>
      <span>Hover on the links above to know more.</span>
    </p>
  )
}

export default ActiveLink
