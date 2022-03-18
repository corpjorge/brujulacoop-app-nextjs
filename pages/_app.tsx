import '../styles/globals.css'
import type { AppProps } from 'next/app'
import 'bootlight/dist/css/bootlight.css'

function MyApp({ Component, pageProps }: AppProps) {
  return <Component {...pageProps} />
}

export default MyApp
