import { useRouter } from "next/router"

// @ts-ignore
const ActiveLink = ({ children, href, className = "selected" }) => {
  const router = useRouter()

  // @ts-ignore
  const handleClick = (e) => {
    e.preventDefault()
    router.push(href)
  }

  return (
    <a
      href={href}
      onClick={handleClick}
      className={router.asPath === href ? className : undefined}
    >
      {children}
    </a>
  )
}

export default ActiveLink
