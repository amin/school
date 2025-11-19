// This component will be using emotion
import styled from "@emotion/styled"
import { Children } from "react";

const FreshHeading = styled.h1`
    color: yellow;
    font-weight: 700;
`;

// Extending a style
const ThinHeading = styled(FreshHeading)`
    font-weight: 200;
`

// Accepting props 
const MixList = styled.div`
 grid-column: 2;
  grid-row: 1 / span 2;       /* right side spans both rows */
  overflow: auto;
  padding: 1rem;
  background-color: ${(props) => props.bg};
`

export function MixedList({bg, children}) {
    return (
        <MixList bg={bg}>
            <FreshHeading>Mixed</FreshHeading>
            <ThinHeading>Thin</ThinHeading>
            <div className="groups">
                {children}
            </div>
            
        </MixList>
    )
}