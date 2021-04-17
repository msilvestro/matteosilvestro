export const toggleClass = (className: string, condition: boolean): string => {
  return condition ? ` ${className}` : ""
}
