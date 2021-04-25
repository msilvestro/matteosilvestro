import { ReactNode, MouseEvent } from "react"
import { useRouter } from "next/router"

type Props = {
  children: ReactNode
  href: string
  className?: string
}

const ActiveLink = ({ children, href, className = "selected" }: Props) => {
  const router = useRouter()

  const handleClick = (e: MouseEvent<HTMLAnchorElement>) => {
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
