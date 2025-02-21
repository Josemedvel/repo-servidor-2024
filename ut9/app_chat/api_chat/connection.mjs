import {createClient} from "@libsql/client"

const client = createClient({
    url: process.env.DB_URL,
    authToken: process.env.API_TOKEN,
  });

export default client