// This component will be using emotion
import styled from "@emotion/styled"


const FreshHeading = styled.h1`
  color: #a78bfa;
  font-weight: 700;
  padding: 0.75rem 1rem;
  margin: 0;
  font-size: 1.1rem;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
`;

const MixList = styled.div`
  grid-column: 2;
  grid-row: 1 / span 2;
  overflow: auto;
  background-color: ${(props) => props.bg};
  border-radius: 1rem;
  border: 1px solid rgba(255, 255, 255, 0.08);
  display: flex;
  flex-direction: column;
`;

const GroupsContainer = styled.div`
  padding: 1rem;
  flex: 1;
`;

export function MixedList({bg, children}) {
    return (
        <MixList bg={bg}>
            <FreshHeading>Mixed</FreshHeading>
            <GroupsContainer>
                {children}
            </GroupsContainer>
            
        </MixList>
    )
}