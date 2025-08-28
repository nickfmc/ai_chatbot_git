# "You" to Company Name Replacement Feature

## Overview
This feature automatically processes user messages to replace references to "you" with the company name specified in the Bot Name setting. This ensures that when users ask questions like "what do you do?", the chatbot interprets it as "what does [Company Name] do?" for more accurate and relevant responses.

## How It Works

### Examples of Message Transformation

**Before (User Input)** → **After (Processed for ChatGPT)**

1. "What do you do?" → "What does PAN do?"
2. "What clients do you represent?" → "What clients does PAN represent?"
3. "Who are you?" → "Who is PAN?"
4. "Do you offer consulting services?" → "Does PAN offer consulting services?"
5. "Can you help with legal matters?" → "Can PAN help with legal matters?"
6. "Are you available on weekends?" → "Is PAN available on weekends?"
7. "How do you handle client cases?" → "How does PAN handle client cases?"
8. "Where are you located?" → "Where is PAN located?"
9. "When do you open?" → "When does PAN open?"
10. "What are your services?" → "What are PAN's services?"

### Supported Patterns

The system recognizes and replaces the following patterns:

#### Question Words + "you"
- "What do/can/are you..." → "What does/can/is [Company]..."
- "Who are you..." → "Who is [Company]..."
- "How do you..." → "How does [Company]..."
- "Where are you..." → "Where is [Company]..."
- "When do/are you..." → "When does/is [Company]..."
- "Why do you..." → "Why does [Company]..."

#### Common Business Questions
- "Do you have/offer/provide..." → "Does [Company] have/offer/provide..."
- "Can you help/assist..." → "Can [Company] help/assist..."
- "Are you available/open..." → "Is [Company] available/open..."

#### Possessive References
- "your services/products/company..." → "[Company]'s services/products/company..."
- "your website/location/hours..." → "[Company]'s website/location/hours..."

#### Client/Customer References
- "what clients do you represent" → "what clients does [Company] represent"
- "who do you serve" → "who does [Company] serve"

#### Experience/History Questions
- "how long have you been" → "how long has [Company] been"
- "when did you start" → "when did [Company] start"

## Configuration

To enable this feature:

1. Go to **WordPress Admin** → **GPT Chatbot** → **Settings**
2. In the **Appearance Settings** section, fill in the **Bot Name** field with your company name
3. Save the settings

**Example:**
- Bot Name: "PAN Legal Services"
- When a user asks "What do you do?", the system processes it as "What does PAN Legal Services do?"

## Benefits

1. **More Accurate Responses**: By replacing vague "you" references with specific company names, the ChatGPT API can provide more contextually relevant answers.

2. **Better Training Data Matching**: When the system checks against training data, it can better match questions that were written with the company name in mind.

3. **Improved User Experience**: Users get more relevant and specific answers to their questions.

4. **Consistent Context**: All conversations maintain proper context about which company/organization the user is asking about.

## Technical Implementation

The feature works by:

1. **Preprocessing**: User messages are processed before being sent to ChatGPT
2. **Pattern Matching**: Uses regular expressions to identify "you" references in different contexts
3. **Replacement**: Replaces matched patterns with the company name from the Bot Name setting
4. **Context Enhancement**: Adds additional instructions to the system prompt to handle "you" references
5. **History Processing**: Also processes conversation history to maintain consistent context

## Logging and Debugging

- Original user questions are still logged in the Unknown Questions feature for analysis
- The preprocessing happens transparently without affecting the user interface
- Both original and processed messages are handled appropriately for different purposes

## Fallback Behavior

- If no Bot Name is configured, the feature is automatically disabled
- The system gracefully handles edge cases and maintains backward compatibility
- If the pattern matching fails, the original message is used as fallback

This feature significantly improves the chatbot's ability to understand and respond to user questions about your business or organization.
